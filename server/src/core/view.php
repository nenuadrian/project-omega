<?php declare(strict_types=1);

abstract class View {
  public static function render(string $view, array $variables = []): void {
        extract($variables);
        require SRC_DIR . "/views/$view.php"; 
    }
}