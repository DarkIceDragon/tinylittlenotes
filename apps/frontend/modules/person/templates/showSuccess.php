<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $person->getId() ?></td>
    </tr>
    <tr>
      <th>First:</th>
      <td><?php echo $person->getFirst() ?></td>
    </tr>
    <tr>
      <th>Last:</th>
      <td><?php echo $person->getLast() ?></td>
    </tr>
    <tr>
      <th>Nickname:</th>
      <td><?php echo $person->getNickname() ?></td>
    </tr>
    <tr>
      <th>Image name:</th>
      <td><?php echo $person->getImageName() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $person->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $person->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('person/edit?id='.$person->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('person/index') ?>">List</a>
