import PropTypes from 'prop-types';
import * as Yup from 'yup';

import { DateField } from '../form/DateField';
import { Form } from '../form/Form';
import { TextInputField } from '../form/TextInputField';
import { SelectField } from '../form/SelectField';
import { SwitchField } from '../form/SwitchField';

import {
  priorityOptions,
  statusOptions,
  typeOptions,
} from '../../constants/optionItems';

function TaskForm({ onConfirm, users }) {
  const validationSchema = Yup.object().shape({
    title: Yup.string().required('Title is required field'),
  });

  const userOptions = users.map((user) => ({
    id: user.id,
    label: user.name,
  }));

  return (
    <Form
      onSubmit={onConfirm}
      validationSchema={validationSchema}
      enableReinitialize
    >
      <TextInputField name="title" label="Title" placeholder="Title" />
      <TextInputField
        name="description"
        label="Description"
        placeholder="Description"
        multiline
        numberOfLines={4}
      />
      <DateField name="dueDate" label="Due Date" />
      <SelectField name="status" label="Status" items={statusOptions} />
      <SelectField name="type" label="Type" items={typeOptions} />
      <SwitchField name="follow" label="Follow changes on task" />
      <SwitchField name="unread" label="Unread" />
      <SelectField name="priority" label="Priority" items={priorityOptions} />
      <SelectField name="assignee" label="Assignee" items={userOptions} />
      <TextInputField name="location" label="Location" placeholder="Location" />
      <TextInputField name="category" label="Category" placeholder="Category" />
      <TextInputField
        name="tags"
        label="Tags"
        placeholder="Separate tags by comma"
      />
      <TextInputField
        name="estimatedTime"
        label="Estimated Time"
        placeholder="Estimated Time"
      />
      <TextInputField
        name="timeSpentOnTask"
        label="Time Spent On Task"
        placeholder="Time Spent On Task"
      />
    </Form>
  );
}

export { TaskForm };

TaskForm.propTypes = {
  onConfirm: PropTypes.func.isRequired,
  users: PropTypes.arrayOf(PropTypes.shape()),
};

TaskForm.defaultProps = {
  users: [],
};
