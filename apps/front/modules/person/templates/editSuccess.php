<?php $person = $form->getObject() ?>
<h1><?php echo $form->isNew() ? 'New' : 'Edit' ?> Person</h1>

<?php echo $form->renderFormTag(url_for('person/update')) ?>
<?php echo $form['name']->renderRow(); ?>
<?php echo $form['title']->renderRow(); ?>
<?php echo $form['parent_id']->renderRow(); ?>

<div id="emails" class="form-item">
<label>Emails</label>
<?php foreach ($form['Emails'] as $email): ?>
  <div class="item:row">
    <?php echo $email['email'] . $email['type'] ?>
  </div>
<?php endforeach; ?>
</div>

    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('person/index') ?>">Cancel</a>
          <?php if (!$form->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'person/delete?id='.$person->get('id'), array('post' => true, 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
</form>
