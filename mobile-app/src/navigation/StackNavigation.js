import { Button } from 'react-native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';

import TaskFormContainer from '../containers/TaskFormContainer';
import routes from '../constants/routes';
import theme from '../constants/theme';
import { TabNavigation } from './TabNavigation';

function StackNavigation() {
  const Stack = createNativeStackNavigator();

  return (
    <Stack.Navigator
      screenOptions={{
        headerStyle: { backgroundColor: theme.colors.white },
        headerTintColor: 'white',
      }}
    >
      <Stack.Screen
        name={routes.HOME}
        component={TabNavigation}
        options={{ headerShown: false, headerShadowVisible: false }}
      />
      <Stack.Screen
        name={routes.TASKS_FORM}
        component={TaskFormContainer}
        options={({ navigation }) => ({
          presentation: 'modal',
          headerLeft: () => (
            <Button
              title="Cancel"
              onPress={() => navigation.goBack()}
              color={theme.colors.primary}
            />
          ),
        })}
      />
    </Stack.Navigator>
  );
}

export { StackNavigation };
