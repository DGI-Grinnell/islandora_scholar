dojo.provide("std.locale");
doh.register("std.locale", [
    function(){
        var test = new StdRhinoTest("locale_TitleCaseEmptyLangEmptyLocale");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("locale_UnknownTerm");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("locale_TitleCaseEnglishLangUpperEmptyLocale");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("locale_TitleCaseGarbageLangEnglishLocale");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("locale_EmptyPlusOverrideTerm");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("locale_EmptyDate");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("locale_EmptyStyleOpt");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("locale_TitleCaseEmptyLangNonEnglishLocale");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("locale_TitleCaseGarbageLangNonEnglishLocale");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("locale_SpecificDate");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("locale_EmptyTerm");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("locale_EmptyPlusOverrideStyleOpt");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("locale_SpecificTerm");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("locale_ForceEmptyAndOthersTerm");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("locale_ForceEmptyEtAlTerm");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("locale_EmptyPlusOverrideDate");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("locale_TitleCaseNonEnglishLangUpperEmptyLocale");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("locale_TitleCaseGarbageLangEmptyLocale");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("locale_NonExistentLocaleDef");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("locale_SpecificStyleOpt");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("locale_OverloadWithEmptyString");
        doh.assertEqual(test.result, test.run());
    }, 
]);
