<?php

namespace FS\SolrBundle\Tests\Solr;

use FS\SolrBundle\Query\DeleteDocumentQuery;

use FS\SolrBundle\Doctrine\Annotation\AnnotationReader;

use FS\SolrBundle\Doctrine\Mapper\Command\CreateFreshDocumentCommand;

use FS\SolrBundle\Doctrine\Mapper\Command\CommandFactory;

use FS\SolrBundle\SolrQuery;

use FS\SolrBundle\SolrQueryFacade;

/**
 *  test case.
 */
class DeleteDocumentQueryTest extends \PHPUnit_Framework_TestCase {

	public function testGetQuery_SearchInAllFields() {
		$document = new \SolrInputDocument();
		$document->addField('id', '1');
		$document->addField('document_name_s', 'validtestentity');
	
		$expected = 'id:1 AND document_name_s:validtestentity';
		$query = new DeleteDocumentQuery($document);
	
		$queryString = $query->getQueryString();
		
		$this->assertEquals($expected, $queryString);
	}
	
}