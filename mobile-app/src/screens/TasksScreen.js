import { SafeAreaView } from 'react-native';

import TaskListContainer from '../containers/TaskListContainer';

function TasksScreen() {
  return (
    <SafeAreaView>
      <TaskListContainer />
    </SafeAreaView>
  );
}

export default TasksScreen;
