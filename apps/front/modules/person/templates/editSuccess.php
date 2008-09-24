<?php $person = $form->getObject() ?>
<h1><?php echo $form->isNew() ? 'New' : 'Edit' ?> Person</h1>

<?php echo $form->renderFormTag('/person/update') ?>
<?php echo $form ?>

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
