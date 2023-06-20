<?php declare (strict_types = 1);

class DeployController extends Controller
{

    public function deploy(): void
    {
      
      $output = shell_exec('cd ~/project-omega && git pull origin main');
  
        // Display the list of all file
        // and directory
        echo "<pre>$output</pre>";
    }

   

}
