<?php

namespace Mkk\Game\Ranking;

use Mkk\Game\RankingAbstract;

require_once 'Mkk/Game/RankingAbstract.php';

class Glicko2 extends RankingAbstract
{

    public function updateRanking()
    {
        if (count($this->_players) == 1) {
            $id = array_keys($this->_players);
            $p = $this->_players[$id[0]];
            $newPhi = sqrt(pow($p->getPhi(),2) + pow($p->getVolatility(),2));
            $p->setNewPhi($newPhi);
        } else {
            foreach ($this->_players as $p) {
                $var = $this->_calculateVariance ($p->getId());
                $sge = $this->_helperSGE ($p->getId());
                $playerSigma = $this->_updateSigma($p->getVolatility(), $p->getPhi(), $var, $var * $sge);
                $newPhi = 1 / sqrt( 1/ (pow($p->getPhi(),2) + pow($playerSigma,2)) + 1/$var);
                
                $p->setNewVolatility($playerSigma)
                  ->setNewPhi($newPhi)
                  ->setNewMu($p->getMu() + pow($newPhi,2) * $sge);
            }
        }
    }

    private function _helperG($phi)
    {
        return 1 / sqrt(1 + 3 * pow($phi,2) / pow(pi(),2));
    }

    private function _helperE($mu1, $mu2, $phi)
    {
        return (1 / ( 1 + exp(-($this->_helperG($phi)) * ($mu1 - $mu2))));
    }

    private function _helperSGE ($playerId)
    {
        $sum = 0;
        $current = $this->_players[$playerId];
        $gameResult = 0;
        foreach ($this->_players as $id => $p) {
            if ($id != $playerId) {
                $g = $this->_helperG($p->getPhi());
                $e = $this->_helperE($current->getMu(), $p->getMu(), $p->getPhi());
                $sum += $g * ($gameResult - $e);
            } else {
                $gameResult = 1;
            }
        }
        return $sum;
    }

    private function _calculateVariance ($playerId)
    {
        $sum = 0;
        $current = $this->_players[$playerId];
        foreach ($this->_players as $id => $p) {
            if ($id != $playerId) {
                $e = $this->_helperE($current->getMu(), $p->getMu(), $p->getPhi());
                $sum += pow($this->_helperG($p->getPhi()),2) * $e * (1 - $e);
            }
        }
        return 1/$sum;
    }

    private function _updateSigma ($playerSigma, $playerPhi, $variance, $delta)
    {
        $x = $a = log(pow($playerSigma,2));
        $tau = 0.75;
        do {
            $d = pow($playerPhi,2) + $variance + exp($x);
            $h1 = -($x - $a) / pow($tau,2) - 0.5 * exp($x) / $d + 0.5 * exp($x) * pow(($delta/$d),2);
            $h2 = -1 / pow($tau,2) - 0.5 * exp($x) * (pow($playerPhi,2) + $variance) / pow($d,2) + 0.5 * pow($delta,2) * exp($x) * (pow($playerPhi,2) + $variance - exp($x)) / pow($d,3);
            $x -= $h1/$h2;
        } while (abs($h1/$h2) > 0.0000001);

        return exp($x/2);
    }
}