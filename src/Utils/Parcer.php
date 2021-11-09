<?php

namespace App\Utils;

class Parcer
{
    private \DOMDocument $dom;
    private \DOMXPath $xpath;

    public function __construct(string $content)
    {
        $this->dom = new \DOMDocument();
        $internalErrors = libxml_use_internal_errors(true);
        $this->dom->loadHTML($content);
        libxml_use_internal_errors($internalErrors);

        $this->xpath = new \DOMXpath($this->dom);
    }

    public function getValues(array $childs): array
    {
        $values = array();

        foreach($childs as $child)
        {
           $element        = $this->xpath->query($child);
           $nodes      =  iterator_to_array($element);
           $nodeValues =  array_map(fn($node) => $node->nodeValue, $nodes);
           $values[]  = [...$nodeValues];
        }

        return $values;
    }

    public function getLinks(string $links): array
    {
        $elements      = $this->xpath->query($links);
        $nodeList      = iterator_to_array($elements);
        $nodeValues[]  = array_map(fn($node) => trim($node->nodeValue), $nodeList);

        return $nodeValues;
    }

    public function setContex($contex) {
        $internalErrors = libxml_use_internal_errors(true);
        $this->dom->loadHTML($contex);
        libxml_use_internal_errors($internalErrors);

        $this->xpath = new \DOMXPath($this->dom);
    }
}