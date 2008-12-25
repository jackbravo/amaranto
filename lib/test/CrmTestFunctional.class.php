<?php

class CrmTestFunctional extends sfTestFunctional
{
  public function loadData()
  {
    Doctrine::loadData(sfConfig::get('sf_data_dir').'/fixtures');
    return $this;
  }
}

