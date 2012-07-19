dojo.provide("std.statute");
doh.register("std.statute", [
    function(){
        var test = new StdRhinoTest("statute_Backref");
        doh.assertEqual(test.result, test.run());
    }, 
]);
