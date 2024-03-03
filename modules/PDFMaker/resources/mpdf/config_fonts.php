<?php


// Optionally define a folder which contains TTF fonts
// mPDF will look here before looking in the usual _MPDF_TTFONTPATH
// Useful if you already have a folder for your fonts
// e.g. on Windows: define("_MPDF_SYSTEM_TTFONTS", 'C:/Windows/Fonts/');
// Leave undefined if not required

// define("_MPDF_SYSTEM_TTFONTS", '');


// Optionally set font(s) (names as defined below in $this->fontdata) to use for missing characters
// when using useSubstitutions. Use a font with wide coverage - dejavusanscondensed is a good start
// only works using subsets (otherwise would add very large file)
// doesn't do Indic or arabic
// More than 1 font can be specified but each will add to the processing time of the script

$this->backupSubsFont = array(
    'dejavusanscondensed'
);


// Optionally set a font (name as defined below in $this->fontdata) to use for CJK characters
// in Plane 2 Unicode (> U+20000) when using useSubstitutions.
// Use a font like hannomb or sun-extb if available
// only works using subsets (otherwise would add very large file)
// Leave undefined or blank if not not required

// $this->backupSIPFont = 'sun-extb';


/*
This array defines translations from font-family in CSS or HTML
to the internal font-family name used in mPDF.
Can include as many as want, regardless of which fonts are installed.
By default mPDF will take a CSS/HTML font-family and remove spaces
and change to lowercase e.g. "Arial Unicode MS" will be recognised as
"arialunicodems"
You only need to define additional translations.
You can also use it to define specific substitutions e.g.
'frutiger55roman' => 'arial'
Generic substitutions (i.e. to a sans-serif or serif font) are set
by including the font-family in $this->sans_fonts below
To aid backwards compatability some are included:
*/
$this->fonttrans = array(
    'helvetica' => 'arial',
    'times' => 'timesnewroman',
    'courier' => 'couriernew',
    'trebuchet' => 'trebuchetms',
    'comic' => 'comicsansms',
    'franklin' => 'franklingothicbook',
    'albertus' => 'albertusmedium',
    'arialuni' => 'arialunicodems',
    'zn_hannom_a' => 'hannoma',
    'ocr-b' => 'ocrb',
    'ocr-b10bt' => 'ocrb'


);

/*
This array lists the file names of the TrueType .ttf or .otf font files
for each variant of the (internal mPDF) font-family name.
['R'] = Regular (Normal), others are Bold, Italic, and Bold-Italic
Each entry must contain an ['R'] entry, but others are optional.
Only the font (files) entered here will be available to use in mPDF.
Put preferred default first in order.
This will be used if a named font cannot be found in any of
$this->sans_fonts, $this->serif_fonts or $this->mono_fonts

['indic'] = true; for special mPDF fonts containing Indic characters
['sip-ext'] = 'hannomb'; name a related font file containing SIP characters

If a .ttc TrueType collection file is referenced, the number of the font
within the collection is required. Fonts in the collection are numbered
starting at 1, as they appear in the .ttc file e.g.
"cambria" => array(
'R' => "cambria.ttc",
'B' => "cambriab.ttf",
'I' => "cambriai.ttf",
'BI' => "cambriaz.ttf",
'TTCfontID' => array(
'R' => 1,
),
),
"cambriamath" => array(
'R' => "cambria.ttc",
'TTCfontID' => array(
'R' => 2,
),
),
*/

$this->fontdata = array(
    "dejavusanscondensed" => array(
        'R' => "DejaVuSansCondensed.ttf",
        'B' => "DejaVuSansCondensed-Bold.ttf",
        'I' => "DejaVuSansCondensed-Oblique.ttf",
        'BI' => "DejaVuSansCondensed-BoldOblique.ttf"
    ),
    "dejavusans" => array(
        'R' => "DejaVuSans.ttf",
        'B' => "DejaVuSans-Bold.ttf",
        'I' => "DejaVuSans-Oblique.ttf",
        'BI' => "DejaVuSans-BoldOblique.ttf"
    ),
    "dejavuserif" => array(
        'R' => "DejaVuSerif.ttf",
        'B' => "DejaVuSerif-Bold.ttf",
        'I' => "DejaVuSerif-Italic.ttf",
        'BI' => "DejaVuSerif-BoldItalic.ttf"
    ),
    "dejavuserifcondensed" => array(
        'R' => "DejaVuSerifCondensed.ttf",
        'B' => "DejaVuSerifCondensed-Bold.ttf",
        'I' => "DejaVuSerifCondensed-Italic.ttf",
        'BI' => "DejaVuSerifCondensed-BoldItalic.ttf"
    ),
    "dejavusansmono" => array(
        'R' => "DejaVuSansMono.ttf",
        'B' => "DejaVuSansMono-Bold.ttf",
        'I' => "DejaVuSansMono-Oblique.ttf",
        'BI' => "DejaVuSansMono-BoldOblique.ttf"
    ),
    "freesans" => array(
        'R' => "FreeSans.ttf",
        'B' => "FreeSansBold.ttf",
        'I' => "FreeSansOblique.ttf",
        'BI' => "FreeSansBoldOblique.ttf"
    ),
    "freeserif" => array(
        'R' => "FreeSerif.ttf",
        'B' => "FreeSerifBold.ttf",
        'I' => "FreeSerifItalic.ttf",
        'BI' => "FreeSerifBoldItalic.ttf"
    ),
    "freemono" => array(
        'R' => "FreeMono.ttf",
        'B' => "FreeMonoBold.ttf",
        'I' => "FreeMonoOblique.ttf",
        'BI' => "FreeMonoBoldOblique.ttf"
    ),
    "verdana" => array(
        'R' => "verdanab.ttf",
        'B' => "verdanab.ttf",
        'I' => "verdanab.ttf"
    ),
    "georgia" => array(
        'R' => "georgia.ttf",
        'B' => "georgiab.ttf",
        'I' => "georgiai.ttf"
    ),
    "trebuchetms" => array(
        'R' => "trebuc.ttf",
        'B' => "trebucbd.ttf",
        'I' => "trebuci.ttf"
    ),
    "comicsansms" => array(
        'R' => "comic.ttf",
        'B' => "comicbd.ttf",
        'I' => "comic.ttf"
    ),
    "lucidasansunicode" => array(
        'R' => "Lucida.ttf",
        'B' => "Lucida.ttf",
        'I' => "Lucidai.ttf"
    ),
    "tahoma" => array(
        'R' => "tahoma.ttf",
        'B' => "tahomabd.ttf",
        'I' => "tahoma.ttf"
    ),


    /* OCR-B font for Barcodes */
    "ocrb" => array(
        'R' => "ocrb10.ttf"
    ),

    /* Thai fonts */
    "garuda" => array(
        'R' => "Garuda.ttf",
        'B' => "Garuda-Bold.ttf",
        'I' => "Garuda-Oblique.ttf",
        'BI' => "Garuda-BoldOblique.ttf"
    ),
    "norasi" => array(
        'R' => "Norasi.ttf",
        'B' => "Norasi-Bold.ttf",
        'I' => "Norasi-Oblique.ttf",
        'BI' => "Norasi-BoldOblique.ttf"
    ),


    /* Indic fonts */
    "ind_bn_1_001" => array(
        'R' => "ind_bn_1_001.ttf",
        'indic' => true
    ),
    "ind_hi_1_001" => array(
        'R' => "ind_hi_1_001.ttf",
        'indic' => true
    ),
    "ind_ml_1_001" => array(
        'R' => "ind_ml_1_001.ttf",
        'indic' => true
    ),
    "ind_kn_1_001" => array(
        'R' => "ind_kn_1_001.ttf",
        'indic' => true
    ),
    "ind_gu_1_001" => array(
        'R' => "ind_gu_1_001.ttf",
        'indic' => true
    ),
    "ind_or_1_001" => array(
        'R' => "ind_or_1_001.ttf",
        'indic' => true
    ),
    "ind_ta_1_001" => array(
        'R' => "ind_ta_1_001.ttf",
        'indic' => true
    ),
    "ind_te_1_001" => array(
        'R' => "ind_te_1_001.ttf",
        'indic' => true
    ),
    "ind_pa_1_001" => array(
        'R' => "ind_pa_1_001.ttf",
        'indic' => true
    ),


    /* XW Zar Arabic fonts */

    "koodak" => array(
        'R' => "Koodak.ttf",
        //'unAGlyphs' => true,
        'useOTL' => 0xFF,
        'useKashida' => 75
    ),
    "xbriyaz" => array(
        'R' => "XB Riyaz.ttf",
        'B' => "XB RiyazBd.ttf",
        'I' => "XB RiyazIt.ttf",
        'BI' => "XB RiyazBdIt.ttf",
        //'unAGlyphs' => true,
        'useOTL' => 0xFF,
        'useKashida' => 75
    ),
    "xbzar" => array(
        'R' => "XB Zar.ttf",
        'B' => "XB Zar Bd.ttf",
        'I' => "XB Zar It.ttf",
        'BI' => "XB Zar BdIt.ttf",
        //'unAGlyphs' => true,
        'useOTL' => 0xFF,
        'useKashida' => 75
    ),
    "nazanin" => array(
        'R' => "BNazanin.ttf",
        'B' => "BNaznnBd.ttf",
        'I' => "BNazanin.ttf",
        'useOTL' => 0xFF,
        'useKashida' => 75
        //'unAGlyphs' => true,
    ),
    "yekan" => array(
        'R' => "BYekan.ttf",
        'B' => "BYekanB.ttf",
        'I' => "BYekanB.ttf",
        'useOTL' => 0xFF,
        'useKashida' => 75,
        //'unAGlyphs' => true
    ),
    "mitra" => array(
        'R' => "MitraLTLight.ttf",
        'B' => "MitraLTBold.ttf",
        'I' => "MitraLTLight.ttf",
        'BI' => "MitraLTLight.ttf",
        'useOTL' => 0xFF,
        'useKashida' => 75,
        //'unAGlyphs' => true
    ),
    "lotus" => array(
        'R' => "Lotus-Light.ttf",
        'B' => "Lotus-Bold.ttf",
        'I' => "Lotus-Light.ttf",
        'BI' => "Lotus-Light.ttf",
        'useOTL' => 0xFF,
        'useKashida' => 75,
        //'unAGlyphs' => true
    ),
    "iraniansans" => array(
        'R' => "AIranianSans.ttf",
        'B' => "AIranianSans.ttf",
        'I' => "AIranianSans.ttf",
        'BI' => "AIranianSans.ttf",
        'useOTL' => 0xFF,
        'useKashida' => 75,
        //'unAGlyphs' => true
    ),
    "xbtitr" => array(
        'R' => "XB Titre.ttf",
        'B' => "XB Titre.ttf",
        'I' => "XB Titre It.ttf",
        'BI' => "XB Titre It.ttf",
        'useOTL' => 0xFF,
        'useKashida' => 75,
        //'unAGlyphs' => true
    ),
    "xmtraffic" => array(
        'R' => "XM Traffic.ttf",
        'B' => "XM Traffic Bd.ttf",
        'I' => "XM Traffic It.ttf",
        'BI' => "XM Traffic BdIt.ttf",
        'useOTL' => 0xFF,
        'useKashida' => 75,
        //'unAGlyphs' => true
    ),
    "xbroya" => array(
        'R' => "XB Roya.ttf",
        'B' => "XB RoyaBd.ttf",
        'I' => "XB RoyaIt.ttf",
        'BI' => "XB RoyaBdIt.ttf",
        'useOTL' => 0xFF,
        'useKashida' => 75,
        //'unAGlyphs' => true
    ),
    "xbkeyhan" => array(
        'R' => "XB Kayhan.ttf",
        'B' => "XB Kayhan Bd.ttf",
        'I' => "XB Kayhan It.ttf",
        'BI' => "XB Kayhan BdIt.ttf",
        'useOTL' => 0xFF,
        'useKashida' => 75,
        //'unAGlyphs' => true
    ),
    "xbkhoramshahr" => array(
        'R' => "XB Khoramshahr.ttf",
        'B' => "XB Khoramshahr Bd.ttf",
        'I' => "XB Khoramshahr It.ttf",
        'BI' => "XB Khoramshahr BdIt.ttf",
        'useOTL' => 0xFF,
        'useKashida' => 75,
        //'unAGlyphs' => true
    ),
    "xbshafigh" => array(
        'R' => "XB Shafigh.ttf",
        'B' => "XB Shafigh Bd.ttf",
        'I' => "XB Shafigh Bd.ttf",
        'BI' => "XB Shafigh BdIt.ttf",
        'useOTL' => 0xFF,
        'useKashida' => 75,
        //'unAGlyphs' => true
    ),
    "xbshiraz" => array(
        'R' => "XB Shiraz.ttf",
        'B' => "XB Shiraz Bd.ttf",
        'I' => "XB Shafigh It.ttf",
        'BI' => "XB Shiraz BdIt.ttf",
        'useOTL' => 0xFF,
        'useKashida' => 75,
        //'unAGlyphs' => true
    ),
    "xbziba" => array(
        'R' => "XP Ziba.ttf",
        'B' => "XP Ziba Bd.ttf",
        'I' => "XP Ziba It.ttf",
        'BI' => "XP Ziba BdIt.ttf",
        'useOTL' => 0xFF,
        'useKashida' => 75,
        //'unAGlyphs' => true
    ),
    "xbyagut" => array(
        'R' => "XB Yagut.ttf",
        'B' => "XB Yagut Bd.ttf",
        'I' => "XB Yagut It.ttf",
        'BI' => "XB Yagut BdIt.ttf",
        'useOTL' => 0xFF,
        'useKashida' => 75,
        //'unAGlyphs' => true
    ),
    "xmvahid" => array(
        'R' => "XM Vahid.ttf",
        'B' => "XM Vahid Bd.ttf",
        'I' => "XM Vahid It.ttf",
        'BI' => "XM Vahid BdIt.ttf",
        'useOTL' => 0xFF,
        'useKashida' => 75,
        //'unAGlyphs' => true
    ),
    "xbtabriz" => array(
        'R' => "XB Tabriz.ttf",
        'B' => "XB Tabriz Bd.ttf",
        'I' => "XB Tabriz It.ttf",
        'BI' => "XB Tabriz BdIt.ttf",
        'useOTL' => 0xFF,
        'useKashida' => 75,
        //'unAGlyphs' => true
    ),
    "xbsols" => array(
        'R' => "XB Sols.ttf",
        'B' => "XB Sols It.ttf",
        'I' => "XB Sols It.ttf",
        'BI' => "XB Sols BdIt.ttf",
        'useOTL' => 0xFF,
        'useKashida' => 75,
        //'unAGlyphs' => true
    ),
    "xbniloofar" => array(
        'R' => "XB Niloofar.ttf",
        'B' => "XB NiloofarBd.ttf",
        'I' => "XB NiloofarIt.ttf",
        'BI' => "XB NiloofarBdIt.ttf",
        'useOTL' => 0xFF,
        'useKashida' => 75,
        //'unAGlyphs' => true
    ),
    "IrSans2" => array(
        'R' => "IrSans.ttf",
        'B' => "IrSans.ttf",
        'I' => "IrSans.ttf",
        'BI' => "IrSans.ttf",
        'useOTL' => 0xFF,
        'useKashida' => 75,
        //'unAGlyphs' => true
    ),
    "xmyermook" => array(
        'R' => "XM Yermook.ttf",
        'B' => "XM Yermook Bd.ttf",
        'I' => "XM Yermook It.ttf",
        'BI' => "XM Yermook BdIt.ttf",
        'useOTL' => 0xFF,
        'useKashida' => 75,
        //'unAGlyphs' => true
    )


    /* Examples of some CJK fonts */
    /*
    "unbatang_0613" => array(
    'R' => "UnBatang_0613.ttf",
    ),
    "sun-exta" => array(
    'R' => "Sun-ExtA.ttf",
    'sip-ext' => 'sun-extb',
    ),
    "sun-extb" => array(
    'R' => "Sun-ExtB.ttf",
    ),
    "hannoma" => array(
    'R' => "HAN NOM A.ttf",
    'sip-ext' => 'hannomb',
    ),
    "hannomb" => array(
    'R' => "HAN NOM B.ttf",
    ),


    'mingliu' => array (
    'R' => 'mingliu.ttc',
    'TTCfontID' => array (
    'R' => 1,
    ),
    'sip-ext' => 'mingliu-extb',
    ),
    'pmingliu' => array (
    'R' => 'mingliu.ttc',
    'TTCfontID' => array (
    'R' => 2,
    ),
    'sip-ext' => 'pmingliu-extb',
    ),
    'mingliu_hkscs' => array (
    'R' => 'mingliu.ttc',
    'TTCfontID' => array (
    'R' => 3,
    ),
    'sip-ext' => 'mingliu_hkscs-extb',
    ),
    'mingliu-extb' => array (
    'R' => 'mingliub.ttc',
    'TTCfontID' => array (
    'R' => 1,
    ),
    ),
    'pmingliu-extb' => array (
    'R' => 'mingliub.ttc',
    'TTCfontID' => array (
    'R' => 2,
    ),
    ),
    'mingliu_hkscs-extb' => array (
    'R' => 'mingliub.ttc',
    'TTCfontID' => array (
    'R' => 3,
    ),
    ),
    */

);


// Add fonts to this array if they contain characters in the SIP or SMP Unicode planes
// but you do not require them. This allows a more efficient form of subsetting to be used.
$this->BMPonly = array(
    "dejavusanscondensed",
    "dejavusans",
    "dejavuserifcondensed",
    "dejavuserif",
    "dejavusansmono",
    "freesans",
    "freeserif"
);

// These next 3 arrays do two things:
// 1. If a font referred to in HTML/CSS is not available to mPDF, these arrays will determine whether
//    a serif/sans-serif or monospace font is substituted
// 2. The first font in each array will be the font which is substituted in circumstances as above
//     (Otherwise the order is irrelevant)
// Use the mPDF font-family names i.e. lowercase and no spaces (after any translations in $fonttrans)
// Always include "sans-serif", "serif" and "monospace" etc.
$this->sans_fonts = array(
    'dejavusanscondensed',
    'dejavusans',
    'freesans',
    'liberationsans',
    'sans',
    'sans-serif',
    'cursive',
    'fantasy',
    'arial',
    'helvetica',
    'verdana',
    'geneva',
    'lucida',
    'arialnarrow',
    'arialblack',
    'arialunicodems',
    'franklin',
    'franklingothicbook',
    'tahoma',
    'garuda',
    'calibri',
    'trebuchet',
    'lucidagrande',
    'microsoftsansserif',
    'trebuchetms',
    'lucidasansunicode',
    'franklingothicmedium',
    'albertusmedium',
    'xbriyaz',
    'albasuper',
    'quillscript'

);

$this->serif_fonts = array(
    'dejavuserifcondensed',
    'dejavuserif',
    'freeserif',
    'liberationserif',
    'serif',
    'timesnewroman',
    'times',
    'centuryschoolbookl',
    'palatinolinotype',
    'centurygothic',
    'bookmanoldstyle',
    'bookantiqua',
    'cyberbit',
    'cambria',
    'norasi',
    'charis',
    'palatino',
    'constantia',
    'georgia',
    'albertus',
    'xbzar',
    'algerian',
    'garamond'
);

$this->mono_fonts = array(
    'dejavusansmono',
    'freemono',
    'liberationmono',
    'courier',
    'mono',
    'monospace',
    'ocrb',
    'ocr-b',
    'lucidaconsole',
    'couriernew',
    'monotypecorsiva'
);

?>
