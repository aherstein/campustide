{include file="include/header.tpl"}
{include file="include/top.tpl"}
{include file="admin/nav.tpl"}
<div id="adminMainContent">
	<h2>School Logo Upload</h2>
	{if $errorMessage != ""}<div class="errorMessage">{$errorMessage}</div>{/if}
	{if $message != ""}<div class="message">{$message}</div>{/if}
	{if isset($logo)}<img src="{$logo}" />{/if}
	<form method="post" action="logos.php" enctype="multipart/form-data">
		<p>
			<select name="school_id">
			<option value="0">Select A School</option>	
			{foreach $schools as $row}
				<option value="{$row['school_id']}">{$row['name']}</option>	
			{/foreach}
			</select>
			<input type="hidden" name="MAX_FILE_SIZE" value="{$MAX_UPLOAD_SIZE}">
			<input type="file" name="logo" />
		</p>
		<input type="submit" value="Upload School Logo" class="button" />&nbsp;
	</form>
</div>
{include file="include/footer.tpl"}
