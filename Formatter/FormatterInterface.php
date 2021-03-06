<?php

declare(strict_types=1);

namespace Scheb\Tombstone\Logger\Formatter;

use Scheb\Tombstone\Core\Model\Vampire;

interface FormatterInterface
{
    /**
     * Formats a Vampire for the log.
     */
    public function format(Vampire $vampire): string;
}
