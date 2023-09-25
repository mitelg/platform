<?php declare(strict_types=1);

namespace Shopware\Tests\Unit\Core\Checkout\Cart\Validator;

use PHPUnit\Framework\TestCase;
use Shopware\Core\Framework\Rule\Container\AndRule;
use Shopware\Core\Framework\Rule\Container\OrRule;
use Shopware\Core\Framework\Rule\RuleCollection;
use Shopware\Tests\Unit\Core\Checkout\Cart\Common\FalseRule;
use Shopware\Tests\Unit\Core\Checkout\Cart\Common\TrueRule;

/**
 * @covers \Shopware\Core\Framework\Rule\RuleCollection
 *
 * @internal
 */
class RuleCollectionTest extends TestCase
{
    public function testMetaCollecting(): void
    {
        $collection = new RuleCollection([
            new TrueRule(),
            new AndRule([
                new TrueRule(),
                new OrRule([
                    new TrueRule(),
                    new FalseRule(),
                ]),
            ]),
        ]);

        static::assertTrue($collection->has(FalseRule::class));
        static::assertTrue($collection->has(OrRule::class));
        static::assertEquals(
            new RuleCollection([
                new FalseRule(),
            ]),
            $collection->filterInstance(FalseRule::class)
        );
    }
}