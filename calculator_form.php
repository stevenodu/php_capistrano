<form method="post">
    <fieldset style="min-height:100px;width:30%;margin-left:10%;">
        <legend>Simple Calculator:</legend>
        <table align="center">
            <tr>
                <td>Enter 1st Number</td>
                <td><input type="text" name="n1" required></td>
            </tr>
            <tr>
                <td>Enter 2nd Number</td>
                <td><input type="text" name="n2" required></td>
            </tr>
            <tr>
                <td>Select Operator</td>
                <td>
                    <select name="op">
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">*</option>
                        <option value="/">/</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="="></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <strong><?php echo htmlspecialchars($result); ?></strong>
                </td>
            </tr>
        </table>
    </fieldset>
</form>
