<?php

namespace craft\coldcache\twigextensions;


/**
 * Class ColdCache_TokenParser
 */
class ColdCache_TokenParser extends \Twig_TokenParser
{
    // Public Methods
    // =========================================================================

    /**
     * @return string
     */
    public function getTag(): string
    {
        return 'coldcache';
    }

    /**
     * Parses {% cache %}...{% endcache %} tags.
     *
     * @inheritdoc
     */
    public function parse(\Twig_Token $token)
    {
        $lineno = $token->getLine();
        $stream = $this->parser->getStream();

        $nodes = [];

        $attributes = [
            'global' => false,
            'durationNum' => null,
            'durationUnit' => null,
        ];

        if ($stream->test(\Twig_Token::NAME_TYPE, 'globally')) {
            $attributes['global'] = true;
            $stream->next();
        }

        if ($stream->test(\Twig_Token::NAME_TYPE, 'using')) {
            $stream->next();
            $stream->expect(\Twig_Token::NAME_TYPE, 'key');
            $nodes['key'] = $this->parser->getExpressionParser()->parseExpression();
        }

        if ($stream->test(\Twig_Token::NAME_TYPE, 'for')) {
            $stream->next();
            $attributes['durationNum'] = $stream->expect(\Twig_Token::NUMBER_TYPE)->getValue();
            $attributes['durationUnit'] = $stream->expect(\Twig_Token::NAME_TYPE, ['sec', 'secs', 'second', 'seconds', 'min', 'mins', 'minute', 'minutes', 'hour', 'hours', 'day', 'days', 'fortnight', 'fortnights', 'forthnight', 'forthnights', 'month', 'months', 'year', 'years', 'week', 'weeks'])->getValue();
        } else if ($stream->test(\Twig_Token::NAME_TYPE, 'until')) {
            $stream->next();
            $nodes['expiration'] = $this->parser->getExpressionParser()->parseExpression();
        }

        if ($stream->test(\Twig_Token::NAME_TYPE, 'if')) {
            $stream->next();
            $nodes['conditions'] = $this->parser->getExpressionParser()->parseExpression();
        } else if ($stream->test(\Twig_Token::NAME_TYPE, 'unless')) {
            $stream->next();
            $nodes['ignoreConditions'] = $this->parser->getExpressionParser()->parseExpression();
        }

        $stream->expect(\Twig_Token::BLOCK_END_TYPE);
        $nodes['body'] = $this->parser->subparse([$this, 'decideCacheEnd'], true);
        $stream->expect(\Twig_Token::BLOCK_END_TYPE);

        return new ColdCache_Node($nodes, $attributes, $lineno, $this->getTag());
    }

    /**
     * @param \Twig_Token $token
     *
     * @return bool
     */
    public function decideCacheEnd(\Twig_Token $token): bool
    {
        return $token->test('endcoldcache');
    }
}
