<?php declare (strict_types = 1);

class DeployController extends Controller
{

    public function deploy(): void
    {
      $project_dir = getcwd() . '/../../../project-omega/server/'; 
      $commands = [
        'cd ' . $project_dir,
        'git pull origin main',
        'rm composer.lock',
        'php composer.phar install',
      ];
      $command = implode(' && ', $commands);

      echo "<pre>$command</pre>";
      
      $output = shell_exec($command);
  
      // Display the list of all file
      // and directory
      echo "<pre>$output</pre>";
    }

}
