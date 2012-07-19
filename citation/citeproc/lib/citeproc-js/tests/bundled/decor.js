dojo.provide("std.decor");
doh.register("std.decor", [
    function(){
        var test = new StdRhinoTest("decor_BreakingQuotes");
        doh.assertEqual(test.result, test.run());
    }, 
]);
