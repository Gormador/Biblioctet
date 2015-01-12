biblioctect-project
===================

Repo for our "Advanced web programmation" 4th year class at the ESIEA. Teacher: A. G.-C.


ATTENTION : Nous utilisons des packages additionnels pour notre site.

Veillez à ajouter (après avoir au fichier app/config/app.php

	Dans la liste des providers : 
		'Bootstrapper\BootstrapperServiceProvider',
		'Intervention\Image\ImageServiceProvider',

	Dans la liste des alias :
		'Accordion'			=> 'Bootstrapper\Facades\Accordion',
		'Alert'				=> 'Bootstrapper\Facades\Alert',
		'Badge'				=> 'Bootstrapper\Facades\Badge',
		'Breadcrumb'		=> 'Bootstrapper\Facades\Breadcrumb',
		'Button'			=> 'Bootstrapper\Facades\Button',
		'ButtonGroup'		=> 'Bootstrapper\Facades\ButtonGroup',
		'Carousel'			=> 'Bootstrapper\Facades\Carousel',
		'ControlGroup'		=> 'Bootstrapper\Facades\ControlGroup',
		'DropdownButton'	=> 'Bootstrapper\Facades\DropdownButton',
		'Form' 				=> 'Bootstrapper\Facades\Form',
		'Helpers'			=> 'Bootstrapper\Facades\Helpers',
		'Icon'				=> 'Bootstrapper\Facades\Icon',
		'InputGroup'		=> 'Bootstrapper\Facades\InputGroup',
		'Image'				=> 'Bootstrapper\Facades\Image',
		'Label'				=> 'Bootstrapper\Facades\Label',
		'MediaObject'		=> 'Bootstrapper\Facades\MediaObject',
		'Modal'				=> 'Bootstrapper\Facades\Modal',
		'Navbar'			=> 'Bootstrapper\Facades\Navbar',
		'Navigation'		=> 'Bootstrapper\Facades\Navigation',
		'Panel'				=> 'Bootstrapper\Facades\Panel',
		'ProgressBar'		=> 'Bootstrapper\Facades\ProgressBar',
		'Tabbable'			=> 'Bootstrapper\Facades\Tabbable',
		'Table'				=> 'Bootstrapper\Facades\Table',
		'Thumbnail'			=> 'Bootstrapper\Facades\Thumbnail',
		'ImageHandler'		=> 'Intervention\Image\Facades\Image',