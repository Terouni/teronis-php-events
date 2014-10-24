<?php
/**
 * @author Roman Ozana <ozana@omdesign.cz>
 */
use Tester\Assert;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/events.php';
\Tester\Environment::setup();


{ // trigger test

	$var = null;

	on(
		'set.true', function () {
			global $var;
			$var = true;
		}
	);

	fire('set.true');

	Assert::true($var);
}

{ // variable filter test

	add_filter(
		'var', function () {
			return true;
		}
	);

	Assert::true(filter('var', false));
}
