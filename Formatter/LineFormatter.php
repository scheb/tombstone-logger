<?php

declare(strict_types=1);

namespace Scheb\Tombstone\Logger\Formatter;

use Scheb\Tombstone\Core\Model\Vampire;

class LineFormatter implements FormatterInterface
{
    public function format(Vampire $vampire): string
    {
        $line = sprintf(
            '%s - Vampire detected: %s, in file %s:%s',
            $vampire->getInvocationDate(),
            (string) $vampire->getTombstone(),
            $vampire->getFile()->getReferencePath(),
            $vampire->getLine()
        );

        if (null !== $method = $vampire->getMethod()) {
            $line .= ', in function '.$method;
        }
        if (null !== $invoker = $vampire->getInvoker()) {
            $line .= ', invoked by '.$invoker;
        }

        return $line.PHP_EOL;
    }
}
