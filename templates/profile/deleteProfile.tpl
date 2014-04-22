{include file="include/header.tpl"}
{include file="include/top.tpl"}

{if $profileDeleted}
<div id="deleteProfile">
	Your account has been deleted.
</div>
{else}
{include file="include/leftNavProfile.tpl"}
<div id="mainContent">
	<form method="post" action="/profile/deleteProfile.php">
		<div class="errorMessage">
			Are you sure you want to delete your profile? This action is IRREVERSABLE!&nbsp;
			<input type="submit" value="Delete Profile" />			
		</div>
	</form>
</div>
{/if}
{include file="include/footer.tpl"}
