import { StyleSheet, SafeAreaView, View, Text, Image } from 'react-native';

import { IconButton } from '../components/cta/IconButton';

import theme from '../constants/theme';
import welcome from '../../assets/welcome.jpg';

function WelcomeScreen({ navigation }) {
  const handleButtonPress = () => {
    navigation.navigate('Tasks');
  };

  return (
    <SafeAreaView style={styles.container}>
      <View>
        <Text style={[styles.heading, styles.welcome]}>Welcome</Text>
        <Text style={styles.heading}>to Task Management Application</Text>
      </View>
      <Image source={welcome} style={styles.image} resizeMode="contain" />
      <View style={styles.buttonContainer}>
        <IconButton text="Get Started" onPress={handleButtonPress} />
      </View>
    </SafeAreaView>
  );
}

export default WelcomeScreen;

const styles = StyleSheet.create({
  container: {
    flex: 1,
    flexDirection: 'column',
    justifyContent: 'flex-end',
    alignItems: 'center',
    backgroundColor: theme.colors.background,
  },
  buttonContainer: {
    padding: theme.spacing.large,
    width: '100%',
  },
  image: {
    width: '100%',
    height: undefined,
    aspectRatio: 1,
  },
  heading: {
    fontSize: theme.typography.fontSize.extraLarge,
    fontWeight: theme.typography.fontWeight.bold,
  },
  welcome: {
    color: theme.colors.primary,
  },
});
