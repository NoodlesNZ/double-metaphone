<?php

class DoubleMetaphoneTest extends \PHPUnit_Framework_TestCase
{
  public function testSingleResult()
  {
    $d = new DoubleMetaphone('aubrey');
    
    $this->assertEquals(array('APR', 'APR'), array($d->primary, $d->secondary));
  }
  
  public function testDoubleResult()
  {
    $d = new DoubleMetaphone('richard');
  
    $this->assertEquals(array('RXRT', 'RKRT'), array($d->primary, $d->secondary));
  }
  
  /**
   * @dataProvider generalWordListProvider
   */
  public function testGeneralWordList($word, $expected)
  {
    $d = new DoubleMetaphone($word);
    
    $this->assertEquals($expected, array($d->primary, $d->secondary));
  }
  
  public function generalWordListProvider()
  {
    return [
      ['Jose', ['HS', 'HS']], // Should be JS/HS ?
      ['cambrillo', ['KMPR', 'KMPR']], // KMPRL/KMPR ?
      ['otto', ['AT', 'AT']],
      ['maurice', ['MRS', 'MRS']],
      ['auto', ['AT', 'AT']],
      ['maisey', ['MS', 'MS']],
      ['catherine', ['K0RN', 'KTRN']],
      ['geoff', ['JF', 'KF']],
      ['Chile', ['XL', 'XL']],
      ['katherine', ['K0RN', 'KTRN']],
      ['steven', ['STFN', 'STFN']],
      ['zhang', ['JNK', 'JNK']],
      ['bob', ['PP', 'PP']],
      ['ray', ['R', 'R']],
      ['Tux', ['TKS', 'TKS']],
      ['bryan', ['PRN', 'PRN']],
      ['bryce', ['PRS', 'PRS']],
      ['Rapelje', ['RPL', 'RPL']],
      ['solilijs', ['SLLS', 'SLLS']],
      ['Dallas', ['TLS', 'TLS']],
      ['Schwein', ['XN', 'XFN']],
      ['dave', ['TF', 'TF']],
      ['eric', ['ARK', 'ARK']],
      ['Parachute', ['PRKT', 'PRKT']],
      ['brian', ['PRN', 'PRN']],
      ['randy', ['RNT', 'RNT']],
      ['Through', ['0R', 'TR']],
      ['Nowhere', ['NR', 'NR']],
      ['heidi', ['HT', 'HT']],
      ['Arnow', ['ARN', 'ARNF']],
      ['Thumbail', ['0MPL', 'TMPL']]
    ];
  }
  
  /**
   * @dataProvider homophonesProvider
   */
  public function testHomophones($h1, $h2)
  {
    $d1 = new DoubleMetaphone($h1);
    $d2 = new DoubleMetaphone($h2);
    
    $this->assertEquals(array($d1->primary, $d1->secondary), array($d2->primary, $d2->secondary));
  }
  
  public function homophonesProvider()
  {
    return [
      ['tolled', 'told'],
      ['katherine', 'catherine'],
      ['brian', 'bryan']
    ];
  }
  
  /**
   * @dataProvider dutchOriginProvider
   */
  public function testDutchOrigin($word, $expected)
  {
    $d = new DoubleMetaphone($word);
    
    $this->assertEquals($expected, array($d->primary, $d->secondary));
  }
  
  public function dutchOriginProvider()
  {
    return [
      ['school', ['SKL', 'SKL']],
      ['schooner', ['SKNR', 'SKNR']],
      //['schermerhorn', ['XRMRRN', 'SKRMRRN']],
      ['schenker', ['XNKR', 'SKNK']] //SKNKR ?
    ];
  }
  
  /**
   * @dataProvider chWordProvider
   */
  public function testChWords($word, $expected)
  {
    $d = new DoubleMetaphone($word);
  
    $this->assertEquals($expected, array($d->primary, $d->secondary));
  }
  
  public function chWordProvider()
  {
    return [
        ['Charac', ['KRK', 'KRK']],
        ['Charis', ['KRS', 'KRS']],
        ['chord', ['KRT', 'KRT']],
        ['Chym', ['KM', 'KM']],
        ['Chia', ['K', 'K']],
        ['chem', ['KM', 'KM']],
        ['chore', ['XR', 'XR']],
        //['orchestra', ['ARKSTR', 'ARKSTR']],
        //['architect', ['ARKTKT', 'ARKTKT']],
        ['orchid', ['ARKT', 'ARKT']]
    ];
  }
  
  /**
   * @dataProvider ccWordProvider
   */
  public function testCcWords($word, $expected)
  {
    $d = new DoubleMetaphone($word);
  
    $this->assertEquals($expected, array($d->primary, $d->secondary));
  }
  
  public function ccWordProvider()
  {
    return [
        //['accident', ['AKSTNT', 'AKSTNT']],
        ['accede', ['AKST', 'AKST']],
        ['succeed', ['SKST', 'SKST']]
    ];
  }
  
  /**
   * @dataProvider mcWordProvider
   */
  public function testMcWords($word, $expected)
  {
    $d = new DoubleMetaphone($word);
  
    $this->assertEquals($expected, array($d->primary, $d->secondary));
  }
  
  public function mcWordProvider()
  {
    return [
        ['mac caffrey', ['MKFR', 'MKFR']],
        //['mac gregor', ['MKRKR', 'MKRKR']],
        ['mc crae', ['MKR', 'MKR']],
        ['mcclain', ['MKLN', 'MKLN']],
        ['McHugh', ['MK', 'MK']]
    ];
  }
  
  /**
   * @dataProvider ghWordProvider
   */
  public function testGhWords($word, $expected)
  {
    $d = new DoubleMetaphone($word);
  
    $this->assertEquals($expected, array($d->primary, $d->secondary));
  }
  
  public function ghWordProvider()
  {
    return [
        ['laugh', ['LF', 'LF']],
        ['cough', ['KF', 'KF']],
        ['rough', ['RF', 'RF']]
    ];
  }
  
  /**
   * @dataProvider g3WordProvider
   */
  public function testG3Words($word, $expected)
  {
    $d = new DoubleMetaphone($word);
  
    $this->assertEquals($expected, array($d->primary, $d->secondary));
  }
  
  public function g3WordProvider()
  {
    return [
        ['gya', ['K', 'J']],
        ["ges", ["KS", "JS"]],
        ["gep", ["KP", "JP"]],
        ["geb", ["KP", "JP"]],
        ["gel", ["KL", "JL"]],
        ["gey", ["K", "J"]],
        ["gib", ["KP", "JP"]],
        ["gil", ["KL", "JL"]],
        ["gin", ["KN", "JN"]],
        ["gie", ["K", "J"]],
        ["gei", ["K", "J"]],
        ["ger", ["KR", "JR"]],
        ["danger", ["TNJR", "TNKR"]],
        ["manager", ["MNKR", "MNJR"]],
        ["dowager", ["TKR", "TJR"]]
    ];
  }
  
  /**
   * @dataProvider pbWordProvider
   */
  public function testPbWords($word, $expected)
  {
    $d = new DoubleMetaphone($word);
  
    $this->assertEquals($expected, array($d->primary, $d->secondary));
  }
  
  public function pbWordProvider()
  {
    return [
        ['Campbell', ['KMPL', 'KMPL']],
        ['raspberry', ['RSPR', 'RSPR']]
    ];
  }
  
  /**
   * @dataProvider thWordProvider
   */
  public function testThWords($word, $expected)
  {
    $d = new DoubleMetaphone($word);
    
    $this->assertEquals($expected, array($d->primary, $d->secondary));
  }
  
  public function thWordProvider()
  {
    return [
      ['Thomas', ['TMS', 'TMS']],
      ['Thames', ['TMS', 'TMS']]
    ];
  }
  
  /**
   * @dataProvider silentLetterWordProvider
   */
  public function testSilentLetters($word, $expected)
  {
    $d = new DoubleMetaphone($word);
    
    $this->assertEquals($expected, array($d->primary, $d->secondary));
  }
  
  public function silentLetterWordProvider()
  {
    return [
        ['Gnome', ['NM', 'NM']],
        ['Know', ['N', 'NF']], // ??
    ];
  }
  
  public function testLeadingX()
  {
    $d = new DoubleMetaphone('Xavier');
    
    $this->assertEquals(['SF', 'SFR'], array($d->primary, $d->secondary));
  }
  
  /**
   * @dataProvider specialCasesProvider
   */
  public function testSpecialCases($word, $expected)
  {
    $d = new DoubleMetaphone($word);
    
    $this->assertEquals($expected, array($d->primary, $d->secondary));
  }
  
  public function specialCasesProvider()
  {
    return [
      ['caesar', ['SSR', 'SSR']],
      ['michael', ['MKL', 'MXL']],
      ['czerny', ['SRN', 'XRN']],
      ['focaccia', ['FKX', 'FKX']],
      ['edge', ['AJ', 'AJ']],
      ['edgar', ['ATKR', 'ATKR']],
      ['ghislane', ['JLN', 'JLN']],
      ['tagliaro', ['TKLR', 'TLR']],
      ['zhao', ['J', 'J']],
      ['filipowicz', ['FLPT', 'FLPF']]
    ];
  }
}