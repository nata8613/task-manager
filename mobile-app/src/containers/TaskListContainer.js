import {
  SafeAreaView,
  StyleSheet,
  View,
  ActivityIndicator,
} from 'react-native';

import { useGetTasksQuery } from '../store/services/rest';
import { TaskList } from '../components/content/TaskList';

import theme from '../constants/theme';

function TaskListContainer() {
  const { data: tasks, isLoading } = useGetTasksQuery();

  return (
    <SafeAreaView>
      <View style={styles.container}>
        {!isLoading ? (
          <TaskList items={tasks} />
        ) : (
          <ActivityIndicator size="large" color={theme.colors.primary} />
        )}
      </View>
    </SafeAreaView>
  );
}

export default TaskListContainer;

const styles = StyleSheet.create({
  container: {
    display: 'flex',
    flexDirection: 'column',
    justifyContent: 'center',
    alignItems: 'center',
    width: '100%',
    padding: theme.spacing.large,
  },
});
