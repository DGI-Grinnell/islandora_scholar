dojo.provide("std.label");
doh.register("std.label", [
    function(){
        var test = new StdRhinoTest("label_FromLocator");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("label_ImplicitForm");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("label_EmbeddedNumberLabel");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("label_NonexistentNameVariableLabel");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("label_SectionFormPageOverride");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("label_EmptyLabelVanish");
        doh.assertEqual(test.result, test.run());
    }, 
    function(){
        var test = new StdRhinoTest("label_FormOverride");
        doh.assertEqual(test.result, test.run());
    }, 
]);
