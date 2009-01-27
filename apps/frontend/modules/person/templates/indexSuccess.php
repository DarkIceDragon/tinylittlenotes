<h1>Person List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>First</th>
      <th>Last</th>
      <th>Nickname</th>
      <th>Image name</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($person_list as $person): ?>
    <tr>
      <td><a href="<?php echo url_for('person/show?id='.$person->getId()) ?>"><?php echo $person->getId() ?></a></td>
      <td><?php echo $person->getFirst() ?></td>
      <td><?php echo $person->getLast() ?></td>
      <td><?php echo $person->getNickname() ?></td>
      <td><?php echo $person->getImageName() ?></td>
      <td><?php echo $person->getCreatedAt() ?></td>
      <td><?php echo $person->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('person/new') ?>">New</a>
