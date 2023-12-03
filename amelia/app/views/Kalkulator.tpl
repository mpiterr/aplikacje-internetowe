{extends file="main.tpl"}

{block name=content}

	<form action="{$conf->action_root}calc" method="post">

			<label for="amount">Kwota kredytu: </label>
			<input id="amount" type="text" name="kwotakredytu" value="{$data->kwotakredytu}"><br /><br />
			<label for="duration">Lata: </label>
			<input id="duration" type="text" name="okreskredytu" value="{$data->okreskredytu}"><br /><br />
			<label for="interest">Oprocentowanie [%]: </label>
			<input id="interest" type="text" name="oprocentowanie" value="{$data->oprocentowanie}"><br /><br />
			<button type="submit">Wylicz</button>
	</form>

	<div class="messages">
		{if $msgs->isError()}
			<h4>Wystąpiły błędy: </h4>
			<ol class="err">
				{foreach $msgs->getMessages() as $msg}
				<li>{$msg->text}</li>
				{/foreach}
			</ol>
		{/if}
		{if $msgs->isInfo()}
			<h4>Informacje: </h4>
			<ol class="inf">
				{foreach $msgs->getMessages() as $msg}
				<li>{$msg->text}</li>
				{/foreach}
			</ol>
		{/if}
		{if isset($result)}
			<h4>Wynik</h4>
			<p class="res">{round($result, 2)}</p>
		{/if}
	</div>
{/block}