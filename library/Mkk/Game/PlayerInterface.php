<?php

namespace Mkk\Game;

interface PlayerInterface {

    public function getId();

    public function getRating();

    public function getRatingDeviation();

    public function setPosition($position);

    public function getPosition();
}