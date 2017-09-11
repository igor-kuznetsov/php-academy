<h2>Comments</h2>
{* This is a Smarty comment, it doesn't exist in the compiled output *}
{*
    this multiline smarty
    comment is
    not sent to browser
*}
<!-- HTML comment that is sent to the browser -->
<h2>Variables</h2>
<h3>Simple</h3>
<p>My name is {$name}</p>
<h3>Arrays</h3>
<p>First value of array: {$myArray[0]}</p>
<p>Value from assoc array by key: {$myArray.test_assoc}</p>
<p>Multi-level array: {$myArray.multi.test}</p>
{* server variable $_SERVER['SERVER_NAME'] *}
<p>$_SERVER['SERVER_NAME']: {$smarty.server.SERVER_NAME}</p>
<h3>Objects</h3>
<p>{$obj->name}</p>
<p>{$obj->test()}</p>
<h2>IF ... ELSE</h2>
{if $boolean_var}
    <p>"true" value</p>
{else}
    <p>"false" value</p>
{/if}