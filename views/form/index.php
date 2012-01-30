<? use Studip\Button, Studip\LinkButton; ?>

<label>
    <select id="options-fieldset">
        <option>1</option>
        <option>2</option>
        <option selected>3</option>
    </select>
    Bereiche anzeigen
    <script>
    $('#options-fieldset').change(function () {
        $('.studip fieldset').hide().filter(':lt(' + this.value + ')').show();
    });
    </script>
</label>
|
<label>
    <input type="checkbox" onclick="$('.studip').toggleClass('settings');">
    .settings
</label>
<label>
    <input type="checkbox" onclick="$('.studip').toggleClass('horizontal');">
    .horizontal
</label>

<hr>

<h1><?= _('Testformular') ?></h1>
<form class="studip" action="<?= $controller->url_for('form/index') ?>" method="get">
    <fieldset>
        <legend>Text: legend</legend>

        <div class="type-text">
            <label for="text">.type-text input[type=text]</label>
            <input type="text" id="text" name="text"
                   value="<?= htmlReady(Request::get('text')) ?>">
        </div>

        <div class="type-text">
            <label for="required">.type-text input[type=text][required]</label>
            <input required type="text" id="required" name="required"
                   value="<?= htmlReady(Request::get('required')) ?>">
        </div>

        <div class="type-text">
            <label for="textarea">.type-text textarea</label>
            <textarea id="textarea" name="textarea"><?= htmlReady(Request::get('textarea')) ?></textarea>
        </div>

        <div class="type-text">
            <label for="password">.type-text input[type=password]</label>
            <input type="password" id="password" name="password"
                   value="<?= htmlReady(Request::get('password')) ?>">
        </div>
    </fieldset>

    <fieldset>
        <legend>Select: legend</legend>
        
        <div class="type-select">
            <label for="select">.type-select select</label>
            <select id="select" name="select">
            <? foreach (words('option foo bar') as $option): ?>
                <option value="<?= htmlReady($option) ?>" <?= Request::option('option') === $option ? 'selected' : '' ?>>
                    <?= htmlReady($option) ?>
                </option>
            <? endforeach; ?>
            </select>
        </div>

        <div class="type-select">
            <label for="select-multiple">.type-select select[multiple]</label>
            <select id="select-multiple" name="select-multiple[]" multiple>
            <? foreach (words('option foo bar') as $option): ?>
                <option value="<?= htmlReady($option) ?>" <?= in_array($option, Request::optionArray('option')) ? 'selected' : '' ?>>
                    <?= htmlReady($option) ?>
                </option>
            <? endforeach; ?>
            </select>
        </div>
    </fieldset>

    <fieldset>
        <legend>Checkbox/Radio - select</legend>
        
        <div class="type-checkbox">
            <label for="checkbox">.type-checkbox input[type=checkbox]</label>
            <input type="checkbox" id="checkbox" name="checkbox" value="1" <?= Request::int('checkbox') ? 'checked' : ''?>>
        </div>

        <div class="type-checkbox">
            <label for="checkbox2">.type-checkbox input[type=checkbox].switch</label>
            <input type="checkbox" id="checkbox2" name="checkbox2" class="switch"
                   value="1" <?= Request::int('checkbox2') ? 'checked' : ''?>>
        </div>

        <div class="type-radio">
            <label for="radio">.type-radio input[type=radio]</label>
            <label>
                <input type="radio" id="radio" name="radio" value="1"
                    <?= Request::int('radio', 1) === 1? 'checked' : '' ?>>
                Option #1
            </label>
            <label>
                <input type="radio" name="radio" value="2"
                    <?= Request::int('radio', 1) === 2 ? 'checked' : '' ?>>
                Option #2
            </label>
        </div>
    </fieldset>

    <div class="type-button">
        <?= htmlReady('.type-button') ?>
        <?= Button::createAccept('absenden', 'submit') ?>
        <?= LinkButton::createCancel('abbrechen', $controller->url_for('form/example/settings')) ?>
    </div>
</form>