<?php

namespace Acme\Tests\Benchmark;

use Acme\TimeConsumer;

class DemoBench
{
	public function benchConsume()
	{
		$consumer = new TimeConsumer();
		$consumer->consume();
	}
}
