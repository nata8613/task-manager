import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';
import { Ionicons } from '@expo/vector-icons';
import { Pressable, View } from 'react-native';

import WelcomeScreen from '../screens/WelcomeScreen';
import TasksScreen from '../screens/TasksScreen';

import routes from '../constants/routes';
import theme from '../constants/theme';

function TabNavigation() {
  const Tab = createBottomTabNavigator();

  return (
    <Tab.Navigator
      screenOptions={() => ({
        headerTitle: '',
        tabBarActiveTintColor: theme.colors.primary,
        tabBarInactiveTintColor: theme.colors.darkGray,
      })}
    >
      <Tab.Screen
        name={routes.WELCOME}
        component={WelcomeScreen}
        options={{
          tabBarIcon: ({ focused, size }) => (
            <Ionicons
              name="home-outline"
              size={size}
              color={focused ? theme.colors.primary : theme.colors.darkGray}
            />
          ),
          color: theme.colors.darkGray,
        }}
      />
      <Tab.Screen
        name={routes.TASKS}
        component={TasksScreen}
        options={({ navigation }) => ({
          tabBarIcon: ({ focused, size }) => (
            <Ionicons
              name="list-outline"
              size={size}
              color={focused ? theme.colors.primary : theme.colors.darkGray}
            />
          ),
          color: theme.colors.darkGray,
          headerRight: () => (
            <Pressable
              onPress={() => {
                navigation.navigate(routes.TASKS_FORM);
              }}
              style={{ marginHorizontal: 8 }}
            >
              <View>
                <Ionicons
                  name="add-outline"
                  size={32}
                  color={theme.colors.primary}
                />
              </View>
            </Pressable>
          ),
        })}
      />
    </Tab.Navigator>
  );
}

export { TabNavigation };
