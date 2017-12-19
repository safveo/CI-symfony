--TEST--
Check file that have correct multiple regex header
--FILE--
<?php

require __DIR__ . '/init.php';

$command = new \DocHeader\Command\Checker(
    null,
    <<<'DOCHEADER'
/*
 * Date: %regexp:\d{2}\.\d{2}.20\d{2}%
 * Year: 20%regexp:\d{2}%
 * Hour: %regexp:[0-1]{2}%:%regexp:[1]%0:%regexp:[2-3]{2}%
 *
 * @%regexp:license MIT%
 */
DOCHEADER

);

$command->run(
    new Symfony\Component\Console\Input\StringInput('check tests/assets/CorrectMultipleRegexHeader.php'),
    new Symfony\Component\Console\Output\StreamOutput(fopen('php://stdout', 'w'))
);

?>
--EXPECTF--
Everything is OK!
