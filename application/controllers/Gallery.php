<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Application
{

	public function index()
	{
                $pix = $this->images->all();
                
                foreach ($pix as $picture)
                    $cell[] = $this->parser->parse('_cell', (array) $picture, true);
                
                $this->load->library('table');
                $parms = array(
                    'table_open' => '<table class="gallery">',
                    'cell_start' => '<td class="oneimage">',
                    'cell_alt_start' => 'td class="oneimage">'
                );
                $this->table->set_templater($parms);
                
                $row = $this->table->make_columns($cell,3);
                $this->data['thetable'] = $this->table->generate($rows);
                
                $this->data['pagebody'] = 'gallery'; 
                $this->render();
	}

}
