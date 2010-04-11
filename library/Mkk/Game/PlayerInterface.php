<?php

namespace Mkk\Game;

interface PlayerInterface {

    public function getId();

    public function getRating();

    public function getRatingDeviation();
}