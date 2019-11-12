<%
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    });
%>
<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
<% if (strpos($action, 'add') === false): %>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $<%= $singularVar %>-><%= $primaryKey[0] %>],
                ['confirm' => __('Are you sure you want to delete # {0}?', $<%= $singularVar %>-><%= $primaryKey[0] %>)]
            )
        ?></li>
<% endif; %>
        <li><?= $this->Html->link(__('List {0}', '<%= $pluralHumanName %>'), ['action' => 'index']) ?></li>
<%
        $done = [];
        foreach ($associations as $type => $data) {
            foreach ($data as $alias => $details) {
                if ($details['controller'] !== $this->name && !in_array($details['controller'], $done)) {
%>
        <li><?= $this->Html->link(__('List {0}', '<%= $this->_pluralHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'index']) %></li>
        <li><?= $this->Html->link(__('New {0}', '<%= $this->_singularHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'add']) %></li>
<%
                    $done[] = $details['controller'];
                }
            }
        }
%>
    </ul>
</nav>
<div class="<%= $pluralVar %> form col-md-10 columns content">
    <?= $this->Form->create($<%= $singularVar %>) ?>
    <fieldset>
        <legend>
            <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
            <?= __('<%= Inflector::humanize($action) %> {0}', '<%= $singularHumanName %>') ?>
        </legend>
        <?php
<%
        $first_input = True;
        foreach ($fields as $field) {
            if (in_array($field, $primaryKey)) {
                continue;
            }
            if (isset($keyFields[$field])) {
                $fieldData = $schema->column($field);
                if (!empty($fieldData['null'])) {
                    if ($first_input) {
%>
            echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>, 'empty' => true, 'autofocus' => 'autofocus']);
<%
                    } else {
%>
            echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>, 'empty' => true]);
<%                      
                    }
                } else {
                    if ($first_input) {
%>
            echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>, 'autofocus' => 'autofocus']);
<%
                    } else {
%>
            echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>]);
<%                      
                    }
                }
                continue;
            }
            if (!in_array($field, ['created', 'modified', 'updated'])) {
                $fieldData = $schema->column($field);
                if (($fieldData['type'] === 'date') && (!empty($fieldData['null']))) {
                    if ($first_input) {
%>
            echo $this->Form->input('<%= $field %>', ['empty' => true, 'default' => '', 'autofocus' => 'autofocus']);
<%
                    } else {
%>
            echo $this->Form->input('<%= $field %>', ['empty' => true, 'default' => '');
<%
                    }
                } else {
                    if ($first_input) {
%>
            echo $this->Form->input('<%= $field %>', ['autofocus' => 'autofocus']);
<%
                    } else {
%>
            echo $this->Form->input('<%= $field %>');
<%
                     }
                }
            }
            $first_input = False;
        }
        if (!empty($associations['BelongsToMany'])) {
            foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
%>
            echo $this->Form->input('<%= $assocData['property'] %>._ids', ['options' => $<%= $assocData['variable'] %>]);
<%
            }
        }
%>
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
