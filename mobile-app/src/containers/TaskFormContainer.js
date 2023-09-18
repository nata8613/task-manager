import { ScrollView, StyleSheet } from 'react-native';
import { TaskForm } from '../components/content/TaskForm';
import { useAddTaskMutation, useGetUsersQuery } from '../store/services/rest';

import theme from '../constants/theme';

function TaskFormContainer() {
  const { data: users } = useGetUsersQuery();
  const [addTask] = useAddTaskMutation();

  const handleCreateTask = (values) => {
    const task = { ...values, tags: values?.tags?.split(',') || [] };
    addTask(task);
  };

  return (
    <ScrollView style={styles.container}>
      <TaskForm onConfirm={handleCreateTask} users={users} />
    </ScrollView>
  );
}

export default TaskFormContainer;

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: theme.colors.background,
  },
});
