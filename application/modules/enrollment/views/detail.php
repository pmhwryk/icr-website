<div class="row">
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <table class="table table-striped table-condensed">
            <tbody>
                <tr>
                    <td>Student Name:</td>
                    <td><?= (isset($enrollment['name']) && !empty($enrollment['name']) ? $enrollment['name'] : '') ?></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td>
                        <?= (isset($enrollment['phone']) && !empty($enrollment['phone']) ? $enrollment['phone'] : '') ?>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <?= (isset($enrollment['email']) && !empty($enrollment['email']) ? $enrollment['email'] : '') ?>
                    </td>
                </tr>
                <tr>
                    <td>Degree/Subject:</td>
                    <td>
                        <?= (isset($enrollment['degree']) && !empty($enrollment['degree']) ? $enrollment['degree'] : '') ?> (<?= (isset($enrollment['subject']) && !empty($enrollment['subject']) ? $enrollment['subject'] : '') ?>)
                    </td>
                </tr>
                <tr>
                    <td>Institute:</td>
                    <td>
                        <?= (isset($enrollment['board']) && !empty($enrollment['board']) ? $enrollment['board'] : 'NILL') ?>
                    </td>
                </tr>
                <tr>
                    <td>Grade/Passing Year:</td>
                    <td>
                        <?= (isset($enrollment['marks']) && !empty($enrollment['marks']) ? $enrollment['marks'] : '') ?> / <?= (isset($enrollment['passing_year']) && !empty($enrollment['passing_year']) ? $enrollment['passing_year'] : '') ?>
                    </td>
                </tr>
                <tr>
                    <td>Career Plan:</td>
                    <td>
                        <?= (isset($enrollment['futureplan']) && !empty($enrollment['futureplan']) ? $enrollment['futureplan'] : '') ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>