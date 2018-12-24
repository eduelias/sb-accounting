<?php

class cad_produtos_caracterTest extends WebTestCase
{
	public $fixtures=array(
		'cad_produtos_caracters'=>'cad_produtos_caracter',
	);

	public function testShow()
	{
		$this->open('?r=cad_produtos_caracter/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=cad_produtos_caracter/create');
	}

	public function testUpdate()
	{
		$this->open('?r=cad_produtos_caracter/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=cad_produtos_caracter/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=cad_produtos_caracter/index');
	}

	public function testAdmin()
	{
		$this->open('?r=cad_produtos_caracter/admin');
	}
}
