import { NavigationContainer } from '@react-navigation/native';
import { Provider } from 'react-redux';

import { StackNavigation } from './src/navigation/StackNavigation';
import { store } from './src/store/store';

export default function App() {
  return (
    <>
      <Provider store={store}>
        <NavigationContainer>
          <StackNavigation />
        </NavigationContainer>
      </Provider>
    </>
  );
}
