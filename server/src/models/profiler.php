<?php declare(strict_types=1);


class Profiler {
    public static array $profiledQueries = [];

    private static object $profiler;
    private static object $console;
    private static bool $debug = false;

    public static function start(): void {
        if (Profiler::$debug) {
            Profiler::$console = new Particletree\Pqp\Console();
            Profiler::$profiler = new Particletree\Pqp\PhpQuickProfiler();

            Profiler::$profiler->setConsole(Profiler::$console);
            Profiler::$profiler->setDisplay(new Particletree\Pqp\Display());
        }
    }

    public static function end(): void {
        if (Profiler::$debug) {
            Profiler::$console->logSpeed('APP END');
        }
    }

    public static function display(): void {
        if (Profiler::$debug) {
            require SRC_DIR . '/views/profiler.php';
            Profiler::$profiler->display();
        }
    }

}
