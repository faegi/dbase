<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace org\majkel\dbase\tests\integration;

use org\majkel\dbase\tests\utils\TestBase;
use org\majkel\dbase\Table;

/**
 * Integration tests of dBase III Format
 *
 * @author majkel
 */
class DBase3Test extends TestBase {

    /**
     * @medium
     * @coversNothing
     */
    public function testReadDbase3() {
        $dbf = new Table('tests/fixtures/dBase3.dbf');
        self::assertSame($dbf->getRecordsCount(), 6);
        $record = $dbf->getRecord(0);
        self::assertSame('4', $record->SL_CHPODPL);
        self::assertSame('Bezp', $record->CHP_ODPLAT);
        self::assertSame(22, $record->NUM);
        self::assertSame('2015-06-26', $record->DAT->format('Y-m-d'));
        self::assertSame(true, $record->LOGIC);
        self::assertSame('memo1', $record->MEMO);
    }

}