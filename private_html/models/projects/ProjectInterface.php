<?php

namespace app\models\projects;

interface ProjectInterface
{
    /**
     * @return string
     */
    public function render();

    /**
     * @return string
     */
    public function renderView();
}