<form method="post">
    <fieldset style="min-height:100px;width:30%;margin-left:10%;">
        <legend>Enter Values:</legend>
        <table align="center">
            <tr>
                <td>Num 1.</td>
                <td><input type="text" name="n1" required></td>
            </tr>
            <tr>
                <td>Num 2.</td>
                <td><input type="text" name="n2" required></td>
            </tr>
            <tr>
                <td>Operator</td>
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
                    <strong>
                        <?php
                        // Display the result, ensuring the variable is properly included
                        if (isset($result)) {
                            echo htmlspecialchars($result);
                        }
                        ?>
                    </strong>
                </td>
            </tr>
        </table>
    </fieldset>
</form>
