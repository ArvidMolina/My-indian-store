{*
 * 2020 Mathias R.
 *
 * NOTICE OF LICENSE
 *
 * This file is licensed under the Software License Agreement
 * With the purchase or the installation of the software in your application
 * you accept the license agreement.
 *
 * @author    Mathias R.
 * @copyright Mathias R.
 * @license   Commercial license (You can not resell or redistribute this software.)
*}

<script>
    $(document).ready(function() {
        $("#formPermissions").submit(function(e) {
            $("#btnPermissions").attr("disabled", true);
            $("#btnPermissions").attr("value", "Please wait ...");
            return true;
        });
        $("#formIndex").submit(function(e) {
            $("#btnIndex").attr("disabled", true);
            $("#btnIndex").attr("value", "Please wait ...");
            return true;
        });
        $("#formFiles").submit(function(e) {
            $("#btnFiles").attr("disabled", true);
            $("#btnFiles").attr("value", "Please wait ...");
            return true;
        });
    });
</script>

<div class="panel">
    <h3></i> {l s='Scripts' mod='securitypro'}</h3>

    <div>
        <p>Change file permissions to 644 and directory permissions to 755. This is highly recommended!</p>
        <form id="formPermissions" action="{$current_url nofilter}&btnPermissions=1" method="POST">
            <input type="submit" class="btn btn-default" id="btnPermissions" value="Fix insecure file- and directory permissions"></input>
        </form>

        <br>
        <p>Fix directory traversal (observing) security vulnerability. This script adds missing index.php files to theme- and module directories. This is highly recommended!</p>
        <form id="formIndex" action="{$current_url nofilter}&btnIndex=1" method="POST">
            <input type="submit" class="btn btn-default" id="btnIndex" value="Add missing index.php files"></input>
        </form>

        {if $show eq 1}
        <br>
        <p>It is highly recommended to remove following files/directories:</p>
        <ul>
            <li>{'</li><li>'|implode:$elements}</li>
        </ul>

        <form id="formFiles" action="{$current_url nofilter}&btnFiles=1" method="POST">
            <input type="submit" class="btn btn-default" id="btnFiles" value="Remove files/directories"></input>
        </form>
        {/if}

    </div>
</div>