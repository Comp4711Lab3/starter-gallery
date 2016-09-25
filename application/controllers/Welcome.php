<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

	public function index()
	{
            // get the newest images from the model    
            $pix = $this->images->newest();
                
            // build an array of formatted cells for them
            foreach ($pix as $picture)
                $cell[] = $this->parser->parse('_cell', (array) $picture, true);
            
            // prime the table class
            $this->load->library('table');
            $parms = array(
                'table_open' => '<table class="gallery">',
                'cell_start' => '<td class="oneimage">',
                'cell_alt_start' => 'td class="oneimage">'
            );
            $this->table->set_templater($parms);
            
            // finally! generate the table
            $row = $this->table->make_columns($cell,3);
            $this->data['thetable'] = $this->table->generate($rows);

            $this->data['pagebody'] = 'welcome'; 
            $this->render();
	}

}
