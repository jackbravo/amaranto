<?php $person = $form->getObject() ?>
<h1><?php echo $form->isNew() ? 'New' : 'Edit' ?> Person</h1>

<form action="<?php echo url_for('person/update'.(!$form->isNew() ? '?id='.$person->get('id') : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <table>
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
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><label for="person_name">Name</label></th>
        <td>
          <?php echo $form['name']->renderError() ?>
          <?php echo $form['name'] ?>
        </td>
      </tr>
      <tr>
        <th><label for="person_code">Code</label></th>
        <td>
          <?php echo $form['code']->renderError() ?>
          <?php echo $form['code'] ?>
        </td>
      </tr>
      <tr>
        <th><label for="person_type">Type</label></th>
        <td>
          <?php echo $form['type']->renderError() ?>
          <?php echo $form['type'] ?>
        </td>
      </tr>
      <tr>
        <th><label for="person_parent_id">Parent id</label></th>
        <td>
          <?php echo $form['parent_id']->renderError() ?>
          <?php echo $form['parent_id'] ?>
        </td>
      </tr>
      <tr>
        <th><label for="person_created_at">Created at</label></th>
        <td>
          <?php echo $form['created_at']->renderError() ?>
          <?php echo $form['created_at'] ?>
        </td>
      </tr>
      <tr>
        <th><label for="person_updated_at">Updated at</label></th>
        <td>
          <?php echo $form['updated_at']->renderError() ?>
          <?php echo $form['updated_at'] ?>

        <?php echo $form['id'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
