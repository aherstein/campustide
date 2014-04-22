{include file="include/header.tpl"}
{include file="include/top.tpl"}
<script type="text/javascript">
	$(function() {
		$("#searchBox").autocomplete({
		    source: "/ajax/schoolsAutoComplete.php",
		    minLength: 1,
		    autoFocus: true
		});
				

		// Error message
		// set effect from select menu value
		$("#searchForm").submit(function()
		{
			var error = false;
			
			$("#errorMessage").hide();

			var search = document.forms[0].search.value;
			if (search == "")
			{
				document.getElementById("errorMessage").innerHTML = "You must enter a University name!";
				$("#errorMessage").show("fade", {}, 300);
				document.forms[0].search.focus();
				error = true;
			}
			else
			{
//				$.get('ajax/schoolsAutoComplete.php', "exact=true&term=" + document.getElementById("searchBox").value, function(data) {
				$.ajax({
					url: "ajax/schoolsAutoComplete.php",
					data: "exact=true&term=" + document.getElementById("searchBox").value,
					dataType: "json",
					async: false,
					success: function(data) {
						if (data == null)
						{
							document.getElementById("errorMessage").innerHTML = "University " + "\"" + search + "\"" + " not found!";
							$("#errorMessage").show("fade", {}, 300);
							document.forms[0].search.focus();
							document.forms[0].search.select();
							error = true;
						}
					}
				});
//				}, "json");
			}
			
			return !error;
		});

		$("#searchBox").keydown(function()
		{
			$("#errorMessage").hide("fade", {}, 300);
		});

		$("#errorMessage").hide();
	});
</script>

<div id="search">
	<img src="/images/splash.png" alt="CampusTide" />
	<form method="get" action="search.php" id="searchForm">
		<span class="label">Enter University Name:</span>
		<div id="searchControls">
			<input type="text" name="search" id="searchBox" class="textbox" {*value="{$search}"*} />&nbsp;
			<input type="submit" id="searchButton" value="Go!" class="button" /><br/>
			<ul>
			{foreach $types as $row}
				<li><input type="checkbox" name="type{$row['type_id']}" id="type{$row['type_id']}Checked" value="true" checked /><label for="type{$row['type_id']}Checked">{$row['description']}</label></li>
			{/foreach}
			</ul>
		</div>
		<div class="errorMessage" id="errorMessage" style="display: none;"></div>
	</form>
</div>
{include file="include/footer.tpl"}
