<?php

namespace App\Twig;

class VersionExtension extends \Twig_Extension 
{
	protected $file;

	public function __construct($file)
    {
        $this->file = $file;
    }

    public function getName()
    {
        return 'app_version_extension';
    }

    public function getYear() 
    {
    	$date = new \DateTime();
        return $date->format('Y');
    }

    public function getVersion()
    {
        return file_get_contents($this->file);
    }

    public function getFunctions() {

    	return array(
    		'year' => new \Twig_Function_Method($this, 'getYear'),
    		'version' => new \Twig_Function_Method($this, 'getVersion')
    	);
    }
}